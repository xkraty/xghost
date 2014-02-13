# The xGhost Project

The xGhost Project has been developed for those Call of Duty Ghosts' player that for many reason doesn't feel good with the provided apps [iOS](https://itunes.apple.com/en/app/call-of-duty/id733712309), [Android](https://play.google.com/store/apps/details?id=com.activision.callofduty.mobile) or [Windows 8](http://apps.microsoft.com/windows/en-us/app/call-of-duty/1fa9f76d-41de-40e6-bb04-8ee90182c1b9).

For example in my clan there are some players that:
- doesn't have a smartphone/tablet
- got a Windows Phone where no app was developed
- an old slow ( like me ) smartphone

and that's getting frustrated Clan War after Clan War cause as leader they all spam for know are we ranked or what target to attack!!

For some reason there is no Web App about that and, since I am a web developer, I decided to make it on my own and share it with the community!

## About

The application aim to __read only__ your data so With the xGhost Web App you can access to:
- your stats
- your clan stats/member/member stats
- your current war ( if there is one running )
- your war history

## License ![creative commons Attribution-NonCommercial-ShareAlike 4.0 International](http://i.creativecommons.org/l/by-nc-sa/3.0/nl/88x31.png)

This software is under the creative commons [Attribution-NonCommercial-ShareAlike 4.0 International](http://creativecommons.org/licenses/by-nc-sa/4.0/legalcode), under the following terms:
* __Attribution__ — You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use
* __NonCommercial__ — You may not use the material for commercial purposes.
* __ShareAlike__ — If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.

so you might:

* __Share__ — copy and redistribute the material in any medium or format
* __Adapt__ — remix, transform, and build upon the material

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
