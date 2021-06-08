function openSearchBar() {
    let icons = document.getElementById('icons');
    let searchBar = document.getElementById('searchForm');

    icons.classList.add('d-none');
    searchBar.classList.remove('d-none');
}

function closeSearchBar() {
    let icons = document.getElementById('icons');
    let searchBar = document.getElementById('searchForm');

    icons.classList.remove('d-none');
    searchBar.classList.add('d-none');
}

function openSearchBarSm() {
    let icons = document.getElementById('iconsSm');
    let searchBar = document.getElementById('searchFormSm');

    icons.classList.add('d-none');
    searchBar.classList.remove('d-none');
}

function closeSearchBarSm() {
    let icons = document.getElementById('iconsSm');
    let searchBar = document.getElementById('searchFormSm');

    icons.classList.remove('d-none');
    searchBar.classList.add('d-none');
}
function closeIcon() {
    let icons = document.getElementById('iconsSm');
    let searchBar = document.getElementById('searchFormSm');

    icons.classList.remove('d-none');
    searchBar.classList.add('d-none');
}