const keyword = document.getElementById('keyword');
const searchContainer = document.getElementById ('search-container');

// event mengetikan keyword pencarian
keyword.onkeyup = function() {
    fetch('ajax/search.php?keyword=' + keyword.value)
    .then(response => response.text())
    .then((text) =>(searchConteiner.InnerHTML));
};