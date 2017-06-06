var Flash;
(function (Flash) {
    var Home;
    (function (Home) {
        var BlogDetailArticleModal=(function () {
            function BlogDetailArticleModal() {
                var self=this;
            }

            BlogDetailArticleModal.prototype.render=function () {
                var self=this;
                self._getArticle();
            }

            BlogDetailArticleModal.prototype._getArticle=function () {
                var self=this;
                self._api().getArticle().then(function (rawData) {

                });
                self._initHeighLight();
            }

            BlogDetailArticleModal.prototype._initHeighLight=function () {
                var self = this;
                hljs.initHighlightingOnLoad();
                hljs.initLineNumbersOnLoad();
            }

            BlogDetailArticleModal.prototype._api=function () {
                var self=this;
                return{
                    /**
                     * [获取文章详情]
                     * @param  {Object} query []
                     * @return {Deferred}       [description]
                     */
                    getArticle:function (query) {
                        return Flash.get('',query);
                    }
                };
            }
            return BlogDetailArticleModal;
        }());
        Home.BlogDetailArticleModal=BlogDetailArticleModal;
    }(Home=Flash.Home||(Flash.Home={})));
}(Flash||(Flash={})));