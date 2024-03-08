const data_background = document.querySelectorAll(".set-bg");
data_background.forEach((element) => {
    const bg = element.dataset.setbg;
    element.style.background = `url(${bg})`;
});
