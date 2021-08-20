
if ($('#search_services')) {
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


// let i = 0;
// let placeholder = "";
// const strings = ["Try 'Company Registration'", "Try 'GST Registration'", "Try 'Trademark'"];
// // const txt = "example@domain.com";
// const speed = 40;

// function type() {
//     strings.forEach((string) => {
//         placeholder += string.charAt(i);
//         document.getElementById("search_services").setAttribute("placeholder", placeholder);
//         i++;
//         setTimeout(type, speed);
//     })
// }

// type();