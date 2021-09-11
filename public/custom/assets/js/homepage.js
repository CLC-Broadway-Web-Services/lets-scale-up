// document.addEventListener('DOMContentLoaded', function () {
//     new Splide('.splide', {
//         arrows: false,
//         // 'arrowPath': 'm15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z',
//         interval: 3000,
//         pagination: false,
//         autoplay: true,
//         pauseOnHover: false,
//         type: 'loop',
//         perPage: 4,
//         breakpoints: {
//             950: {
//                 perPage: 3,
//             },
//             750: {
//                 perPage: 2,
//             },
//             450: {
//                 perPage: 1,
//             }
//         }
//     }).mount();
// });

if ($('#search_services').length) {
    var options = {
        strings: ["Try 'Company Registration'", "Try 'GST Registration'", "Try 'Trademark'"],
        typeSpeed: 70,
        backSpeed: 50,
        backDelay: 500,
        startDelay: 1000,
        loop: true,
        attr: 'placeholder',
        bindInputFocusEvents: true,
        shuffle: true,
    };
    var typed = new Typed('#search_services', options);
}

function onClickDataList(url_to_go) {
    console.log(url_to_go);
    window.location.href = url_to_go;
}

var searchservices = [];
searchservices = JSON.parse($('#searchservices').html());
search_services
const searchServicesForm = $('#search-services-form');
const search_services_input = $('#search_services');

const autoSuggestDiv = $('#autoSuggestList');
const suggestionList = $('#suggestionList');

searchServicesForm.submit(function (ev) {
    ev.preventDefault();
    var str = search_services_input.val();
    findService(str);
})

search_services_input.on('keyup', function () {
    var str = $(this).val();
    findService(str);
})

function findService(string) {
    if (string && string.length > 3) {
        // $(this).blur();
        var rgxp = new RegExp(string, "i");
        searchservices.forEach((service) => {
            if (service['service_title'].search(rgxp) !== -1) {
                showSuggestions(rgxp);
            }
        })
    } else {
        suggestionList.html('');
        autoSuggestDiv.hide();
    }
}

function showSuggestions(rgxp) {
    var list = '';
    searchservices.filter((service) => {
        if (service['service_title'].search(rgxp) !== -1) {
            var service_title = service['service_title'];
            var service_slug = service['service_slug'];
            list += '<li class=""><a href="/service/' + service_slug + '">' + service_title + '</a></li>';
            console.log('list done')
        }
    });
    console.log('list show')
    suggestionList.html(list);
    autoSuggestDiv.show();
}
