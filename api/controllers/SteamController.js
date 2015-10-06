/**
 * SteamController
 *
 * @description :: Server-side logic for managing steams
 * @help        :: See http://sailsjs.org/#!/documentation/concepts/Controllers
 */

module.exports = {
    /**
     * `SteamController.home()`
     */
    home: function (req, res) {
        var constant = require('steamifyCfg');
        var steamApi = require('steam-web');

        var steam = new steamApi({
            apiKey: constant.keyDev,
            format: 'json' //optional ['json', 'xml', 'vdf']
        });
        var user;
        var identif;
        Passport
            .findOne({user: req.user.id})
            .exec(function (err, passport) {
                user = passport.identifier;
                identif = user.split("/");
                getProfil();
            });


        var getProfil = function getProfil() {
            steam.getPlayerSummaries({
                steamids: [identif[5]],
                callback: function (err, data) {
                    console.log(JSON.stringify(data));
                    return res.json({data: data});
                }
            });
        }
    },
    redirect: function (req, res) {
        return res.redirect('http://127.0.0.1:8081');
    },
    /**
     * `SteamController.remotehome()`
     * accessible via l’url steam/remotehome?access_token=$ACCESSTOKEN$
     */
    remotehome: function (req, res) {
        return res.json({
            todo: 'remotehome() is not implemented yet! But you are authorized :)'
        });
    }
}
;
