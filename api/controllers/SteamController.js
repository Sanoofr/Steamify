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
    home: function (req, res, options) {
        var steam = require('steam-web');

        var s = new steam({
            apiKey: '',
            format: 'json' //optional ['json', 'xml', 'vdf']
        });
        Passport
            .findOne({user: req.user.id})
            .exec(function (err, passport) {
                var user = passport.identifier;


                console.log(user);
                var identif = user.split("/");
                s.getPlayerSummaries({
                    steamids: [identif[5]],
                    callback: function (err, data) {
                        console.log(JSON.stringify(data));
                        //return res.json({data: data});
                    }
                })
                return res.json({
                    todo: 'home() is not implemented yet! But you are logged in :)',
                    user: req.user,
                    token: passport.tokens === undefined ? passport.accessToken : passport.tokens.token
                    //steam don't stock token in bdd
                });

            });

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
