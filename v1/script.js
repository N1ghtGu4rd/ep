document.addEventListener('DOMContentLoaded', function () {
    var btnScrollToTop = document.getElementById('btnScrollToTop');

    window.addEventListener('scroll', function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btnScrollToTop.style.display = 'block';
        } else {
            btnScrollToTop.style.display = 'none';
        }
    });
});

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
