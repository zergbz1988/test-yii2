var infoVisibilityBtn = document.getElementById('infoVisibilityBtn');
if (infoVisibilityBtn) {
    infoVisibilityBtn.onclick = function(e) {
        e.preventDefault();
        var elem = e.target;
        document.body.classList.toggle('with-hidden');
        if (document.body.classList.contains('with-hidden')) {
            elem.innerHTML = 'Показать доп. информацию';
        } else {
            elem.innerHTML = 'Скрыть доп. информацию';
        }
    };
}
