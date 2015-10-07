/**
 * SteamController
 *
 * @description :: Server-side logic for managing steams
 * @help        :: See http://sailsjs.org/#!/documentation/concepts/Controllers
 */
var constant = require('../../config/steamifyCfg');
var steamApi = require('steam-web');
var steam = new steamApi({
    apiKey: constant.keyDev,
    format: 'json' //optional ['json', 'xml', 'vdf']
});


var getProfil = function getProfil() {
    steam.getPlayerSummaries({
        steamids: [identif[5]],
        callback: function (err, data) {
            console.log(JSON.stringify(data));
            return res.json({data: data});
        }
    });
};

module.exports = {
    /**
     * `SteamController.home()`
     */
    connexion: function (req, res) {
        var user;
        var identif;
        Passport
            .findOne({user: req.user.id})
            .exec(function (err, passport) {
                user = passport.identifier;
                identif = user.split("/");
                return res.redirect('http://127.0.0.1:8081/connexion/' + identif[5]);
            });
    }
};
