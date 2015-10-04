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
        Passport
            .findOne({user: req.user.id})
            .exec(function (err, passport) {
                return res.json({
                    todo: 'home() is not implemented yet! But you are logged in :)',
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
};
