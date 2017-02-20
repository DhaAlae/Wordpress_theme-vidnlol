$("#PageList100").each(function() {
    var e = "<nav class='nav-menu'><span href='#' id='mainpull' class='fa fa-bars' /><ul><li><ul class='sub-menu'>";
    $("#PageList100 li").each(function() {
        var t = $(this).text(),
            n = t.substr(0, 1),
            r = t.substr(1);
        "_" == n ? (n = $(this).find("a").attr("href"), e += '<li><a href="' + n + '">' + r + "</a></li>") : (n = $(this).find("a").attr("href"), e += '</ul></li><li><a href="' + n + '">' + t +
            "</a><ul class='sub-menu'>")
    });
    e += "</ul></li></ul></nav>";
    $(this).html(e);
    $("#PageList100 ul").each(function() {
        var e = $(this);
        if (e.html().replace(/\s|&nbsp;/g, "").length == 0) e.remove()
    });
    $("#PageList100 li").each(function() {
        var e = $(this);
        if (e.html().replace(/\s|&nbsp;/g, "").length == 0) e.remove()
    })
});


    (function($) {
        $.fn.smartimages = function(size, hInPer, callback) {
            var $w = $(window),
                images = this,
                loaded;

            this.one("smartimages", function() {
                var $el = $(this),
                    imgw = $el.outerWidth();
                if (hInPer === false) {
                    var imgh = $el.closest("li").outerHeight();
                } else {
                    var imgh = Math.round(imgw * hInPer);
                }
                var $src = $el.css("background-image"),
                    $bg = $src.replace(/(^url\()|(\)$|[\"\'])/g, ''),
                    $resizebg = $bg.replace(size, "w" + imgw + "-h" + imgh + "-c"),
                    $preloadbg = $('<img/>').attr('src', $resizebg);
                if ($src.match("s72-c")) {
                    $preloadbg.on('load', function() {
                        $(this).remove();
                        $el.css('background-image', 'url(' + $resizebg + ')').removeClass("loading").addClass("loaded");
                    });
                    if (typeof callback === "function") callback.call(this);
                }
            });

            function smartimages() {
                var inview = images.filter(function() {
                    var $e = $(this);
                    if ($e.is(":hidden")) return;

                    var wt = $w.scrollTop(),
                        wb = wt + $w.height(),
                        et = $e.offset().top,
                        eb = et + $e.height();

                    return eb >= wt && et <= wb;
                });

                loaded = inview.trigger("smartimages");
                images = images.not(loaded);
            }

            $w.on("load scroll", smartimages);

            return this;
        };
    })(window.jQuery);

    // Advanced Post feeds Script
    var noThumb = "";

    function feedPost(parent, type, label, num, smtimgs) {
        var startIndex = Math.floor((Math.random() * num) + 1),
            furl = "";
        if (label !== undefined) {
            if (label.match('recent-posts')) {
                furl = '/feeds/posts/default?alt=json-in-script&max-results=' + num;
            }
            if (label.match("random-posts")) {
                furl = '/feeds/posts/default?alt=json-in-script&orderby=updated&start-index=' + startIndex + '&max-results=' + num;
            }
            if (!(label.match('random-posts') || label.match('recent-posts'))) {
                furl = '/feeds/posts/default/-/' + label + '?alt=json-in-script&max-results=' + num;
            }
        }
        if (furl.length) {
            parent.html("<div class='spinner-wrap'><span class='spinner'></span></div>");
            $.ajax({
                url: furl,
                type: 'get',
                dataType: "jsonp",
                success: function(data) {
                    var posturl = "";
                    if (type == 'related-posts') {
                        var htmlcode = '<div class="related-posts-title"><h4>Related Posts</h4></div><ul>';
                    } else if (type == 'feed-widgets') {
                        var htmlcode = '<ul class="eikon-feeds">';
                    } else {
                        var htmlcode = '<ul>';
                    }
                    for (var i = 0; i < data.feed.entry.length; i++) {
                        for (var j = 0; j < data.feed.entry[i].link.length; j++) {
                            if (data.feed.entry[i].link[j].rel == "alternate") {
                                posturl = data.feed.entry[i].link[j].href;
                                break;
                            }
                        }
                        var posttitle = data.feed.entry[i].title.$t;
                        if (data.feed.entry[i].category[0].term !== undefined) {
                            var tag = data.feed.entry[i].category[0].term;
                        }
                        var author = data.feed.entry[i].author[0].name.$t;
                        var comments = data.feed.entry[i].thr$total.$t + ' Comments';
                        var get_date = data.feed.entry[i].published.$t,
                            year = get_date.substring(0, 4),
                            month = get_date.substring(5, 7),
                            day = get_date.substring(8, 10),
                            date = month + '/' + day + '/' + year;
                        var content = data.feed.entry[i].content.$t;
                        var $content = $('<div>').html(content);
                        var sum = $content.text().substr(0, 100);
                        if (content.indexOf("<img") !== -1 || content.indexOf("youtube.com/embed") !== -1) {
                            if (data.feed.entry[i].media$thumbnail !== undefined) {
                                var src = data.feed.entry[i].media$thumbnail.url;
                            }
                        }
                        if (src !== undefined) {
                            if (src.match("default.html")) {
                                var $src = src.replace("default.html", "hqdefault.html");
                            }
                            if (src.match("s72-c")) {
                                var $src = src;
                            }
                        }
                        if (content.indexOf("<img") === -1 && content.indexOf("youtube.com/embed") === -1) {
                            var $src = noThumb;
                        }
                        var thumb = '<a href="' + posturl + '"><div class="thumb loading" style="background-image: url(' + $src + ');"></div></a>';
                        var blockcode = '';
                        if (type == 'featured-posts') {
                            blockcode += "<li><div class='item-wrap'>" + thumb + "<div class='item-panel'><div class='item-labels post-meta'><a href=/search/label/" + tag + ">" + tag +
                                "</a></div><h3 class='item-title'><a href='" + posturl + "'>" + posttitle + "</a></h3><div class='item-snippet'>" + sum +
                                "</div><div class='item-footer'><span class='item-date'><i class='fa fa-clock-o'></i>" + date +
                                "</span><span class='dot-div'> • </span><span class='item-comment'><i class='fa fa-comment-o'></i>" + comments + "</span></div></div></div></li>";
                        }
                        if (type == 'related-posts' || type == 'feed-widgets') {
                            blockcode += "<li><div class='thumb-wrap'>" + thumb + "</div><h5 class='item-title'><a href=" + posturl + ">" + posttitle + "</a></h5><div class='item-date'><i class='fa fa-clock-o'></i>" +
                                date + "</div></li>";
                        }
                        htmlcode += blockcode;
                    }
                    htmlcode += '</ul>';
                    parent.html(htmlcode);
                    parent.find("div.thumb").smartimages("s72-c", smtimgs);
                }
            });
        }
    }

    (function($) {
        var index_layout = $.trim($("#HTML850 .widget-content").text()),
            index_layout_elm = $("body.index"),
            index_opts = ["right-sidebar", "left-sidebar", "no-sidebar"];
        if (index_layout === index_opts[1]) {
            index_layout_elm.addClass(index_opts[1]).removeClass(index_opts[0]);
        }
        if (index_layout === index_opts[2]) {
            index_layout_elm.addClass(index_opts[2]).removeClass(index_opts[0]);
        }

        var g_post_lyt = $.trim($("#HTML851 .widget-content").text()),
            i_post_lyt_elm = $("body.item .post, body.static_page .post"),
            i_post_lyt = $.trim(i_post_lyt_elm.text()),
            post_lyt_elm = $("body.item, body.static_page"),
            post_opts = ["right-sidebar", "left-sidebar", "no-sidebar"];
        if (i_post_lyt.match(post_opts[0]) || i_post_lyt.match(post_opts[1]) || i_post_lyt.match(post_opts[2])) {
            if (i_post_lyt.match(post_opts[0])) {
                i_post_lyt_elm.html(function(i, t) {
                    return t.replace(post_opts[0], '');
                });
            }
            if (i_post_lyt.match(post_opts[1])) {
                post_lyt_elm.addClass(post_opts[1]).removeClass(post_opts[0]);
                i_post_lyt_elm.html(function(i, t) {
                    return t.replace(post_opts[1], '');
                });
            }
            if (i_post_lyt.match(post_opts[2])) {
                post_lyt_elm.addClass(post_opts[2]).removeClass(post_opts[0]);
                i_post_lyt_elm.html(function(i, t) {
                    return t.replace(post_opts[2], '');
                });
            }
        } else {
            if (g_post_lyt === post_opts[1]) {
                post_lyt_elm.addClass(post_opts[1]).removeClass(post_opts[0]);
            }
            if (g_post_lyt === post_opts[2]) {
                post_lyt_elm.addClass(post_opts[2]).removeClass(post_opts[0]);
            }
        }
        $("body.error_page").addClass(post_opts[2]).removeClass(post_opts[0], post_opts[1])

        var header_style = $.trim($("#HTML852 .widget-content").text()),
            header_style_elm = $(".header-wrapper");
        if (header_style === "short") {
            header_style_elm.addClass("short");
        }

        var featured_style = $.trim($("#HTML853 .widget-content").text()),
            featured_style_elm = $("#featured");
        if (featured_style === "style1") {
            featured_style_elm.addClass("style-one").removeClass("default");
        }
        if (featured_style === "style2") {
            featured_style_elm.addClass("style-two ct-wrapper").removeClass("default");
        }
        if (featured_style === "style3") {
            featured_style_elm.addClass("style-three").removeClass("default");
        }

        var post_style = $.trim($("#HTML854 .widget-content").text()),
            post_style_elm = $(".blog-posts");
        if (post_style === "large-image") {
            post_style_elm.addClass("large-image").removeClass("default");
        }
        if (post_style === "two-column") {
            post_style_elm.addClass("two-column").removeClass("default");
        }
        if (post_style === "three-column") {
            post_style_elm.addClass("three-column").removeClass("default");
        }
        if (post_style === "post-lists") {
            post_style_elm.addClass("post-lists").removeClass("default");
        }

        if (($("#HTML856 .widget-content").text().match("hide"))) {
            $(".eikon-share-buttons").addClass("inactive")
        }

        // Post Snippet Excrept
        $('.hpost-snippet').each(function() {
            var txt = $(this).text();
            var j = txt.lastIndexOf(' ');
            if (j > 0) $(this).text(txt.substr(0, 180).replace(/[?,!\.-:;]*$/,
                '...'));
        });
        // Add Date to Popular Posts Sidebar Widget
        $('.PopularPosts .widget-content ul li').each(function() {
            var $this = $(this);
            var postlink = $this.find('.item-title a');
            var postURL = postlink.attr('href');
            var postimgURL = $this.find('.item-thumbnail a img').attr('src');
            $.get(postlink.attr('href'), function(data) {
                postlink.parent().after('<div class="item-meta">' + $(
                    data).find('.post-timestamp').html() + '</div>');
            }, "html");
        });
        $(".sidebar-wrapper .widget h2, #footer .widget h2").wrap("<div class='widget-title'/>");
        $(".comments h4").wrap("<div class='comm-title'/>");
        $("ul.sub-menu").parent("li").addClass("hasSub");
        $(".Profile .profile-img").attr('src', function(i, src) {
            return src.replace('s80-c', 's150-c');
        });
        if ($("body").hasClass("item")) {
            (function(e) {
                var t = e("a.blog-pager-newer-link");
                var n = e("a.blog-pager-older-link");
                e.get(t.attr("href"), function(n) {
                    t.html('<span>' + e(n).find(".post h1.post-title").text() + "</span>")
                }, "html");
                e.get(n.attr("href"), function(t) {
                    n.html('<span>' + e(t).find(".post h1.post-title").text() + "</span>")
                }, "html")
            })(jQuery)
        }

        $(".post-thumb .thumb").smartimages("s72-c", .60);

        //Main Menu
        $(function() {
            var mpull = $('#mainpull');
            mmenu = $('.nav-menu ul');
            mmenuHeight = mmenu.height();
            $(mpull).on('click', function(e) {
                e.preventDefault();
                mmenu.slideToggle()
            });
            $(window).resize(function() {
                var w = $(window).width();
                if (w > 320 && mmenu.is(':hidden')) {
                    mmenu.removeAttr('style')
                }
            })
        });

    }(jQuery));

    // Ajax Feeds: Featured Slider
    $(".featured .HTML .widget-content").each(function() {
        var $this = $(this),
            sp = $this.text().split("index.html"),
            num = sp[0],
            label = sp[1];
        feedPost($this, 'featured-posts', label, num, false);
    });

    // Ajax Feeds: Related Posts
    if (!($("#HTML855 .widget-content").text().match("hide"))) {
        $("body.item .related-posts").each(function() {
            var $this = $(this),
                label = $this.text();
            $this.addClass("active");
            feedPost($this, 'related-posts', label, 3, .80);
        });
    }

    // Sidebar/Footer Widgets: Recent Posts, Random Posts, Featured post
    $(".sidebar .widget-content, .footer .widget-content").each(function() {
        var $this = $(this),
            sp = $this.text().split("index.html"),
            num = sp[0],
            label = sp[1];
        feedPost($this, 'feed-widgets', label, num, false);
    });
    /*]]>*/
</script>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="../www.blogger.com/static/v1/widgets/127631110-widgets.js"></script>
<script type="text/javascript" src="../apis.google.com/js/plusone.js"></script>
<script type='text/javascript'>
window['__wavt'] = 'AOuZoY4FubR7IFwfrzB1jL4LzC1q83K7jg:1487167434690';
_WidgetManager._Init('//www.blogger.com/rearrange?blogID\x3d8510576969454812066', 'index.html', '8510576969454812066');
_WidgetManager._SetDataContext([{
'name': 'blog',
'data': {
'blogId': '8510576969454812066',
'bloggerUrl': 'https://www.blogger.com',
'title': 'Eikon - demo2',
'pageType': 'index',
'url': 'http://eikon-demo2.blogspot.in/',
'canonicalUrl': 'http://eikon-demo2.blogspot.com/',
'homepageUrl': 'http://eikon-demo2.blogspot.in/',
'searchUrl': 'http://eikon-demo2.blogspot.in/search',
'canonicalHomepageUrl': 'http://eikon-demo2.blogspot.com/',
'blogspotFaviconUrl': 'http://eikon-demo2.blogspot.in/favicon.ico',
'hasCustomDomain': false,
'enabledCommentProfileImages': true,
'gPlusViewType': 'FILTERED_POSTMOD',
'adultContent': false,
'analyticsAccountNumber': '',
'useUniversalAnalytics': false,
'pageName': '',
'pageTitle': 'Eikon - demo2',
'encoding': 'UTF-8',
'locale': 'en_GB',
'localeUnderscoreDelimited': 'en_gb',
'isPrivate': false,
'isMobile': false,
'isMobileRequest': false,
'mobileClass': '',
'isPrivateBlog': false,
'languageDirection': 'ltr',
'feedLinks': '\x3clink rel\x3d\x22alternate\x22 type\x3d\x22application/atom+xml\x22 title\x3d\x22Eikon - demo2 - Atom\x22 href\x3d\x22http://eikon-demo2.blogspot.com/feeds/posts/default\x22 /\x3e\n\x3clink rel\x3d\x22alternate\x22 type\x3d\x22application/rss+xml\x22 title\x3d\x22Eikon - demo2 - RSS\x22 href\x3d\x22http://eikon-demo2.blogspot.com/feeds/posts/default?alt\x3drss\x22 /\x3e\n\x3clink rel\x3d\x22service.post\x22 type\x3d\x22application/atom+xml\x22 title\x3d\x22Eikon - demo2 - Atom\x22 href\x3d\x22https://www.blogger.com/feeds/8510576969454812066/posts/default\x22 /\x3e\n',
'meTag': '',
'openIdOpTag': '\x3clink rel\x3d\x22openid.server\x22 href\x3d\x22https://www.blogger.com/openid-server.g\x22 /\x3e\n\x3clink rel\x3d\x22openid.delegate\x22 href\x3d\x22http://eikon-demo2.blogspot.com/\x22 /\x3e\n',
'mobileHeadScript': '',
'adsenseHostId': 'ca-host-pub-1556223355139109',
'ieCssRetrofitLinks': '\x3c!--[if IE]\x3e\x3cscript type\x3d\x22text/javascript\x22 src\x3d\x22https://www.blogger.com/static/v1/jsbin/844239678-ieretrofit.js\x22\x3e\x3c/script\x3e\n\x3c![endif]--\x3e',
'view': '',
'dynamicViewsCommentsSrc': '//www.blogblog.com/dynamicviews/4224c15c4e7c9321/js/comments.js',
'dynamicViewsScriptSrc': '//www.blogblog.com/dynamicviews/e0e12520ae29f840',
'plusOneApiSrc': 'https://apis.google.com/js/plusone.js',
'sharing': {
'platforms': [{
    'name': 'Get link',
    'key': 'link',
    'shareMessage': 'Get link',
    'target': ''
}, {
    'name': 'Facebook',
    'key': 'facebook',
    'shareMessage': 'Share to Facebook',
    'target': 'facebook'
}, {
    'name': 'BlogThis!',
    'key': 'blogThis',
    'shareMessage': 'BlogThis!',
    'target': 'blog'
}, {
    'name': 'Twitter',
    'key': 'twitter',
    'shareMessage': 'Share to Twitter',
    'target': 'twitter'
}, {
    'name': 'Pinterest',
    'key': 'pinterest',
    'shareMessage': 'Share to Pinterest',
    'target': 'pinterest'
}, {
    'name': 'Google+',
    'key': 'googlePlus',
    'shareMessage': 'Share to Google+',
    'target': 'googleplus'
}, {
    'name': 'Email',
    'key': 'email',
    'shareMessage': 'Email',
    'target': 'email'
}],
'googlePlusShareButtonWidth': 300,
'googlePlusBootstrap': '\x3cscript type\x3d\x22text/javascript\x22\x3ewindow.___gcfg \x3d {\x27lang\x27: \x27en_GB\x27};\x3c/script\x3e'
}
}
}, {
'name': 'features',
'data': {
'enhancedSourcesets': 'false',
'unsupported_browser_message': 'false'
}
}, {
'name': 'messages',
'data': {
'linkCopiedToClipboard': 'Link copied to clipboard',
'postLink': 'Post link'
}
}, {
'name': 'template',
'data': {
'name': 'custom',
'localizedName': 'Custom',
'isResponsive': false,
'isAlternateRendering': false,
'isCustom': true
}
}, {
'name': 'view',
'data': {
'classic': {
'name': 'classic',
'url': '?view\x3dclassic'
},
'flipcard': {
'name': 'flipcard',
'url': '?view\x3dflipcard'
},
'magazine': {
'name': 'magazine',
'url': '?view\x3dmagazine'
},
'mosaic': {
'name': 'mosaic',
'url': '?view\x3dmosaic'
},
'sidebar': {
'name': 'sidebar',
'url': '?view\x3dsidebar'
},
'snapshot': {
'name': 'snapshot',
'url': '?view\x3dsnapshot'
},
'timeslide': {
'name': 'timeslide',
'url': '?view\x3dtimeslide'
},
'isMobile': false,
'title': 'Eikon - demo2',
'description': 'Simple yet Versatile',
'url': 'http://eikon-demo2.blogspot.in/',
'type': 'feed',
'isSingleItem': false,
'isMultipleItems': true,
'isError': false,
'isPage': false,
'isPost': false,
'isHomepage': true,
'isArchive': false,
'isSearch': false,
'isLabelSearch': false
}
}]);
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML100', 'header-top-ad', null, document.getElementById('HTML100'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HeaderView', new _WidgetInfo('Header1', 'header', null, document.getElementById('Header1'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_PageListView', new _WidgetInfo('PageList100', 'header-right', null, document.getElementById('PageList100'), {
'title': 'Main Menu',
'links': [{
'isCurrentPage': true,
'href': 'http://eikon-demo2.blogspot.in/',
'title': 'Home'
}, {
'isCurrentPage': false,
'href': 'http://eikon-demo2.blogspot.in/p/sample-page.html',
'id': '3976991739223708504',
'title': 'Sample Page'
}, {
'isCurrentPage': false,
'href': 'http://eikon-demo2.blogspot.in/p/typography.html',
'id': '3194531562216443756',
'title': 'Typography'
}],
'mobile': false
}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML102', 'featured', null, document.getElementById('HTML102'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML103', 'header-below-ad', null, document.getElementById('HTML103'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_BlogView', new _WidgetInfo('Blog1', 'content', null, document.getElementById('Blog1'), {
'cmtInteractionsEnabled': false,
'lightboxEnabled': true,
'lightboxModuleUrl': 'https://www.blogger.com/static/v1/jsbin/3485499253-lbx__en_gb.js',
'lightboxCssUrl': 'https://www.blogger.com/static/v1/v-css/368954415-lightbox_bundle.css'
}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML3', 'sidebar', null, document.getElementById('HTML3'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML1', 'sidebar', null, document.getElementById('HTML1'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_PopularPostsView', new _WidgetInfo('PopularPosts2', 'sidebar', null, document.getElementById('PopularPosts2'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_LabelView', new _WidgetInfo('Label2', 'sidebar', null, document.getElementById('Label2'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_ProfileView', new _WidgetInfo('Profile1', 'footer-left', null, document.getElementById('Profile1'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_PopularPostsView', new _WidgetInfo('PopularPosts1', 'footer-center', null, document.getElementById('PopularPosts1'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_LabelView', new _WidgetInfo('Label4', 'footer-right', null, document.getElementById('Label4'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML2', 'footer-right', null, document.getElementById('HTML2'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML850', 'admin-panel', null, document.getElementById('HTML850'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML851', 'admin-panel', null, document.getElementById('HTML851'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML852', 'admin-panel', null, document.getElementById('HTML852'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML853', 'admin-panel', null, document.getElementById('HTML853'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML854', 'admin-panel', null, document.getElementById('HTML854'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML855', 'admin-panel', null, document.getElementById('HTML855'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML856', 'admin-panel', null, document.getElementById('HTML856'), {}, 'displayModeFull'));
_WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML857', 'admin-panel', null, document.getElementById('HTML857'), {}, 'displayModeFull'));
