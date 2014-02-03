<?php
/* ********************************************************************************************
  -- Powered by xKraty --

  xGhost class implement Call of Duty Ghosts API for retrieve and parse CoD accounts data
  that since today are only available with the Call of Duty App

  App Store: https://itunes.apple.com/en/app/call-of-duty/id733712309
  Play Store: https://play.google.com/store/apps/details?id=com.activision.callofduty.mobile
  Windows Store: http://apps.microsoft.com/windows/en-us/app/call-of-duty/1fa9f76d-41de-40e6-bb04-8ee90182c1b9

  require Zend_Http_Client
  require Zend_Loader
  require Zend_Uri
  require Zend_Validate

  @__construct [filename]
    setup client and vars

  @login [credentials]
    @credentials format array( 'email' => 'youremail', password => 'yourpassword')
    - login and retrieve the needed token for future requests
    - retrieve user account info

 ******************************************************************************************* */
use Zend\Http\Client;

class xGhost {

  protected $_config_file = false;
  protected $_config = false;
  protected $_client = false;
  protected $_user = false;

  function __construct($config_file = 'ghost')
  {
    $this->_config_file = $config_file;
    $config = CONFIGDIR.$this->_config_file.'.ini';
    if ( file_exists($config) ) {
      $this->_config = parse_ini_file($config, true);
      if ( $this->_config ) {
        $this->_client = new Client();
        $this->_client->setOptions($this->_config['http_config']);

        $this->_user = $this->getSession();
        return true;
      }
    } else {
      die('Config not found => '.$config);
    }
    return false;
  }

  public function getSession()
  {
    if ( isset($_SESSION['xGhost']['user']) && $_SESSION['xGhost']['user'] ) {
      return $_SESSION['xGhost']['user'];
    }
    return false;
  }

  public function login($credentials = false)
  {
    if ( !$credentials || !is_array($credentials) ) {
      if ( isset($this->_config['credentials']) && is_array($this->_config['credentials']) ) {
        $credentials = $this->_config['credentials'];
      }
    }
    if ( $this->_client && $credentials ) {
      $this->_client->setUri($this->_config['url']['login']);
      $this->_client->setMethod('POST');
      $this->_client->setParameterPost($credentials);
      $request = $this->_client->send();
      if ( $request->isSuccess() ) {
        $header = $request->getHeaders();
        $response = $request->getBody();
        // Cleaning parameters
        $this->_client->resetParameters();
        // Checking if login is valid
        if ( preg_match("/send\(\"loginComplete\",'(.*)'\)/i", $response, $match) ) {
          $account_info = json_decode($match[1]);
          $this->_user = new stdClass;
          $this->_user->username = $account_info->User->accountList->account->username;
          $this->_user->ucdID = $account_info->User->ucdID;
          $cookies = $this->_client->getCookies();
          if ( $cookies && count($cookies) ) {
            foreach ( $cookies as $cookie ) {
              if ( $cookie->getName() == 'token' ) {
                $this->_user->session_token = $cookie->getValue();
              }
            }
          }
          $_SESSION['xGhost']['user'] = $this->_user;
          return $this->_user;
        }
      }
    }
    return false;
  }

  public function logout()
  {
    unset($_SESSION['xGhost']);
  }

  public function userStats($ucdID = false)
  {
    $ucdID = $ucdID ? $ucdID : $this->_user->ucdID;
    if ( $this->_client && $this->_user) {
      $params = array(
        'session_token' => $this->_user->session_token,
        'bh_network' => 'steam',
        'config_check' => 'false'
      );
      $this->_client->setMethod('GET');
      $this->_client->setParameterGet($params);
      $this->_client->setUri($this->_config['url']['user'].$ucdID.'/stats');
      $request = $this->_client->send();
      if ( $request->isSuccess() ) {
        $response = json_decode($request->getBody());
        if ( isset($response->user) ) {
          $_SESSION['xGhost']['user']->clanId = $response->user->clan->teamId;
          return $response->user;
        }
        return $response;
      }
      return false;
    }
  }

  public function currentWar()
  {
    if ( $this->_client && $this->_user) {
      $params = array(
        'session_token' => $this->_user->session_token,
        'config_check' => 'false'
      );
      $this->_client->setMethod('GET');
      $this->_client->setParameterGet($params);
      $this->_client->setUri($this->_config['url']['currentwar'].$this->_user->clanId.'/since/'.time());
      $request = $this->_client->send();
      if ( $request->isSuccess() ) {
        $response = json_decode($request->getBody());
        if ( !isset($response->error) ) {
          return $response;
        }
      }
      return false;
    }
  }

}
