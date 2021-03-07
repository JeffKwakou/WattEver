$(document).ready(function() {
    // Script du slider de mise en situation du produit
    $('.banniere-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        dots: true,
        speed: 2000,
        adaptiveHeight: true,
    });

    // Script du slider de mise en situation du produit
    $('.situation-slider').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 3,
        prevArrow: "<button type='button' class='slick-prev pull-left'> < </button>",
        nextArrow: "<button type='button' class='slick-next pull-right'> > </button>",
        responsive: [{
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // Script pour la ambassadeur profil card
    $('.ambassadeur-slider').slick({
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 3,
        prevArrow: "<button type='button' class='slick-prev pull-left'> < </button>",
        nextArrow: "<button type='button' class='slick-next pull-right'> > </button>",
        responsive: [{
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // Script pour la gallerie photo
    $('.follow-slider').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 3,
        prevArrow: "<button type='button' class='slick-prev pull-left'> < </button>",
        nextArrow: "<button type='button' class='slick-next pull-right'> > </button>",
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // FILTRE ARTICLES EN SITUATION

    // Filtre neige
    $('#neige-filter').click(() => {
        $('.situation-slider').slick('slickUnfilter');
        $('.situation-slider').slick('slickFilter', '.neige');
    });

    // Filtre tous
    $('#tous-filter').click(() => {
        $('.situation-slider').slick('slickUnfilter');
        $('.situation-slider').slick('slickFilter', '.tous');
    });

    // Filtre tout-chemin
    $('#tout-chemin-filter').click(() => {
        $('.situation-slider').slick('slickUnfilter');
        $('.situation-slider').slick('slickFilter', '.tout-chemin');
    });

    // Filtre montagne
    $('#montagne-filter').click(() => {
        $('.situation-slider').slick('slickUnfilter');
        $('.situation-slider').slick('slickFilter', '.montagne');
    });

    // Filtre littoral
    $('#littoral-filter').click(() => {
        $('.situation-slider').slick('slickUnfilter');
        $('.situation-slider').slick('slickFilter', '.littoral');
    });

    // ANIMATION DES DESCRIPTIONS DES MEMBRES DE L'EQUIPE

    function displayDescriptionMembre(membre) {
        console.log("in");
        $("." + membre + " .membre-hover").stop();
        $("." + membre + " .description-membre").stop();
        $("." + membre + " .membre-network").stop();

        $("." + membre + " .membre-hover").animate({
            opacity: '1',
            top: '0%'
        }, "slow");

        $("." + membre + " .description-membre").animate({
            opacity: '0'
        }, "slow");
        $("." + membre + " .membre-network").animate({
            opacity: '0'
        }, "slow");
    }

    function hideDescriptionMembre(membre) {
        console.log("out");
        $("." + membre + " .membre-hover").stop();
        $("." + membre + " .description-membre").stop();
        $("." + membre + " .membre-network").stop();

        $("." + membre + " .membre-hover").animate({
            opacity: '0',
            top: '100%'
        }, "slow");

        $("." + membre + " .description-membre").animate({
            opacity: '1'
        }, "slow");
        $("." + membre + " .membre-network").animate({
            opacity: '1'
        }, "slow");
    }

    // Membre 1
    $(".membreTeam1").on("mouseenter", () => {
        displayDescriptionMembre("membreTeam1");
    });

    $(".membreTeam1").on("mouseleave", () => {
        hideDescriptionMembre("membreTeam1");
    });

    // Membre 2
    $(".membreTeam2").on("mouseenter", () => {
        displayDescriptionMembre("membreTeam2");
    });

    $(".membreTeam2").on("mouseleave", () => {
        hideDescriptionMembre("membreTeam2");
    });

    // Membre 3
    $(".membreTeam3").on("mouseenter", () => {
        displayDescriptionMembre("membreTeam3");
    });

    $(".membreTeam3").on("mouseleave", () => {
        hideDescriptionMembre("membreTeam3");
    });

    // Membre 3
    $(".membreTeam4").on("mouseenter", () => {
        displayDescriptionMembre("membreTeam4");
    });

    $(".membreTeam4").on("mouseleave", () => {
        hideDescriptionMembre("membreTeam4");
    });

    // ANIMATION DES ARTICLES ACTUALITES

    function displayArticle(article) {
        $("." + article + " .hover-article").stop();
        $("." + article + " .description-article").stop();
        $("." + article + " .article-network").stop();

        $("." + article + " .hover-article").animate({
            opacity: '1',
            top: '0%'
        }, "slow");

        $("." + article + " .description-article").animate({
            opacity: '0'
        }, "slow");
        $("." + article + " .article-network").animate({
            opacity: '0'
        }, "slow");
    }

    function hideArticle(article) {
        $("." + article + " .hover-article").stop();
        $("." + article + " .description-article").stop();
        $("." + article + " .article-network").stop();

        $("." + article + " .hover-article").animate({
            opacity: '0',
            top: '100%'
        }, "slow");

        $("." + article + " .description-article").animate({
            opacity: '1'
        }, "slow");
        $("." + article + " .article-network").animate({
            opacity: '1'
        }, "slow");
    }

    // Article 1
    $(".article-item1").on("mouseenter", () => {
        displayArticle("article-item1");
    });

    $(".article-item1").on("mouseleave", () => {
        hideArticle("article-item1");
    });

    // Article 2
    $(".article-item2").on("mouseenter", () => {
        displayArticle("article-item2");
    });

    $(".article-item2").on("mouseleave", () => {
        hideArticle("article-item2");
    });

    // Article 3
    $(".article-item3").on("mouseenter", () => {
        displayArticle("article-item3");
    });

    $(".article-item3").on("mouseleave", () => {
        hideArticle("article-item3");
    });


    // FLUX INSTAGRAM EMOTT WITHOUT ACCESS TOKEN
    $.get('https://www.instagram.com/explore/tags/emott/?__a=1', function(data, status) {
        for (var i = 0; i < 3; i++) {

            var $this = data.graphql.hashtag.edge_hashtag_to_media.edges[i].node;
            var item = document.createElement("div");
            item.className = 'col-4';
            item.innerHTML = '<img src="' + $this.thumbnail_resources[2].src + '">';
            $('#photo_a_la_une').append(item);
        }
        for (var i = 0; i < 18; i++) {

            var $this = data.graphql.hashtag.edge_hashtag_to_media.edges[i].node;
            var item = document.createElement("div");
            item.className = 'slider-item-follow';
            item.innerHTML = '<img src="' + $this.thumbnail_resources[2].src + '">';
            $(".follow-slider").slick('slickAdd', item);
        }
    });



    // FLUX INSTAGRAM WITH ACCESS TOKEN
    // var token = 'Bearer IGQVJXZA0hkQkVOUnduXzMybmlkZAThxUzNUX0gwZAFA0MkpzMzlsWVlEcWN4dExFUmFPWE5KYVAwSGxydThFakZAJeGc3Qi1mcHdKZAXNORlp1VjMwSWpXWkdQb0pMUmRNNWVTaVFaNjdhTjB0ZAGtFbEN0SQZDZD',
    //     hashtag = 'emott', // hashtag without # symbol
    //     num_photos = 12;

    // $.ajax({
    //     url: 'https://api.instagram.com/v1/tags/' + hashtag + '/media/recent',
    //     dataType: 'jsonp',
    //     type: 'GET',
    //     data: { access_token: token, count: num_photos },
    //     success: function(data) {
    //         console.log(data);
    //         for (x in data.data) {
    //             $('#instagram').append('<div><img src="' + data.data[x].images.standard_resolution.url + '"></div>');
    //         }
    //     },
    //     error: function(data) {
    //         console.log(data);
    //     }
    // });
});