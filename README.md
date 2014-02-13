# The xGhost Project

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

## About

The application aim to __read only__ your data so with the xGhost Web App you can access to:

- your player stats
- your clan stats/member/member stats
- your current war (if there is one running)
- your war history

## License

![creative commons Attribution-NonCommercial-ShareAlike 4.0 International](http://i.creativecommons.org/l/by-nc-sa/3.0/nl/88x31.png)

See [LICENSE](https://github.com/xkraty/xghost/blob/master/LICENSE) for more info.

***

## Requirements
The only requirement is a web server with PHP 5.4.0+

## Installation
If you wanna install it just download the zip and upload it on your own hosting! Isn't it easy?

***
## Deploying on Heroku

If you are an Heroku user you can easily deploy your app by using this custom buildpack that includes [composer](https://getcomposer.org/) support and DocumentRoot setup

```
heroku create --buildpack https://github.com/CHH/heroku-buildpack-php my-app-name
```
