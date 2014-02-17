# The xGhost Project - v. Alpha

The xGhost Project has been developed for those Call of Duty Ghosts' player that, for many reasons, doesn't feel good with the provided apps:

* [iOS](https://itunes.apple.com/en/app/call-of-duty/id733712309)
* [Android](https://play.google.com/store/apps/details?id=com.activision.callofduty.mobile)
* [Windows 8](http://apps.microsoft.com/windows/en-us/app/call-of-duty/1fa9f76d-41de-40e6-bb04-8ee90182c1b9)

For example, in my clan there are some players that:

- don't have a smartphone or a tablet
- have a Windows Phone whose version is not supported
- (like me) have an old, slow smartphone

and that get even more frustrating!
When doing Clan Wars, leaders get spammed by teammates by questions such as "What's our rank?" or "Who should we attack next?".

For some unknown reasons there was still no Web App to provide those useful informations and, since I am a web developer, I decided to change that by making  that Web App on my own and by sharing it with the community!

What's cool about xGhost? xGhost it's responsive so it has no device restriction, it should adapt to kinda every resolution and it's 10x faster than the app! You can use with every smartphone, computer and tablet, you could even check your clan war status with the washing machine if it has a browser and trust me one day it will have a browser!!
![xghost showcase](http://oi57.tinypic.com/29yjl6w.jpg)

## Alpha version

xGhost is under development so it still poor and bugged but it should be helpfull, i rushed the alpha release due to the incoming war but i'm already studying a new stunning layout and features to add! Any tip, critic, suggestion help is appreciated :)

A [live demo](http://web-ghost.herokuapp.com/public/index.php) is available!

### F.A.Q.

1 How do i log in?
- You simply login with your Call of Duty account!

2 What? I should use my CoD account on your site?
- No you __DON'T__ have, if you wish to try it you can use it but you still can download it. There is no database and password are not stored, i wouldn't care anyway of your CoD account; i has mine!

3 How do i install it?
- If you met the requirements just follow the __1 step__ installation, scroll down

4 Nah! I don't trust you i won't give you my CoD password!
- Ok [bye](http://www.google.com)!

5 What if i fell in love with you?
- Chocolate is always appreciated :)

6 Any other stupid F.A.Q. ?
- No, i'm done!

## About

The application aim to __read only__ your data so with the xGhost Web App you can access to:
- your player stats
- your clan stats/member/member stats
- your current war (if there is one running)
- your war history

## License

![creative commons Attribution-NonCommercial-ShareAlike 4.0 International](http://i.creativecommons.org/l/by-nc-sa/3.0/nl/88x31.png)

See [LICENSE](https://github.com/xkraty/xghost/blob/master/LICENSE) for more info.

## Disclaimer
See [disclaimer](https://github.com/xkraty/xghost/blob/master/app/views/misc/disclaimer.html) for more info.
***

## Requirements
The only requirement is a web server with PHP 5.4.0+

## Installation
If you wanna install it just download the [zip](https://github.com/xkraty/xghost/zipball/master) and upload it on your own hosting! Isn't it easy?

Note: if you know how to, you should set the DocumentRoot of your virtual host to the [public/ dir](https://github.com/xkraty/xghost/tree/master/public)

***
## Deploying on Heroku

If you are an Heroku user you can easily deploy your app by using this custom buildpack that includes [composer](https://getcomposer.org/) support and DocumentRoot setup

```
heroku create --buildpack https://github.com/CHH/heroku-buildpack-php my-app-name
```

## Customization (optional)

In the main directory of your app you can customize the following params in [bootstrap.php](https://github.com/xkraty/xghost/blob/master/bootstrap.php#L46):
- LOCALE: is the default language, current available in english (en) and italian(it) only
- DATE_FORMAT: how to display dates ( eg: m/d/Y for US format )
- date_default_timezone_set: check here your country [timezones](http://php.net/manual/en/timezones.php)

## Contribute

### Localization

If your language is missing and you willing to help support it you can just take the [english](https://github.com/xkraty/xghost/blob/master/app/i18n/en.php) file and translate the right column leaving the left side keys untouched

## Issues

Since i doesn't have much free time for any issues you having you might open a [github issue](https://github.com/xkraty/xghost/issues) so you can be supported by the community and you may find the solution faster if anyone else had your same issues

## Donations

If you think this project worth a buck! Buy me a cup of coffee!
[![](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](http://goo.gl/6m2iJ1)

## Updates

You can follow me on [twitter](https://twitter.com/xKraty) for updates and info on [#xGhost](https://twitter.com/search?q=%23xGhost)
