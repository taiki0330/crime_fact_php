const genreItem = document.querySelectorAll('.main_genre_item');
const titleItem = document.querySelectorAll('.title_content_item');
const toggler = document.querySelectorAll('.title_item');
const crimeDate = document.querySelectorAll('.crime_date');
const sortButton = document.querySelector('.sort_button');
const listContent = document.querySelector('.list_content');
const searchInput = document.querySelector('#search-input');
const searchResult = document.querySelector('#search-results');



// タブクリックで表示変更
for (let i = 0; i < genreItem.length; i++) {
  genreItem[i].addEventListener('click', (e) => {
    e.preventDefault();

    for (let j = 0; j < genreItem.length; j++) {
      genreItem[j].classList.remove('active');
    }

    for (let j = 0; j < genreItem.length; j++) {
      titleItem[j].classList.remove('active');
    }
    genreItem[i].classList.add('active');
    titleItem[i].classList.add('active');
  });
}

// アコーディオントグル
toggler.forEach((selected) => {
  selected.addEventListener('click', () => {
    selected.classList.toggle('show');
    let content = selected.nextElementSibling;
    content.classList.toggle('show');
  });
});


// 検索
searchInput.addEventListener('input', () => {
  const keyword = searchInput.value;

  let searchArr = [];
  toggler.forEach((item) => {
    let targetText = item.textContent;
    if(targetText.indexOf(keyword)) {
      searchArr.push(targetText);
    }
  })
})