// Team member popups

popups.forEach(popup => {
	popup.addEventListener('click', function (e) {
		e.preventDefault();
		let target = this.dataset.target;
		let classes = this.dataset.classes;
		let pop = document.getElementById(target);
		let content = pop.querySelector('.popup-content');
		content.scroll(0, 0);
		document.body.classList.toggle('no-scroll');
		pop.classList.toggle(classes);
		//console.log();
	});
});

// Team member popups navigation

function getPopup(button) {
	let target = button.dataset.target;
	let popup = document.getElementById(target);
	let content = popup.querySelector('.popup-content');
	let close = popup.querySelector('.popup-close');
	return { popup, content, close };
}

prev.forEach(button => {
	button.addEventListener('click', function (e) {
		e.preventDefault();
		let pop = getPopup(button);
		let prev = pop.popup.parentElement.previousElementSibling.querySelector(
			'a.member-card'
		);
		pop.content.scroll(0, 0);
		pop.close.click();
		prev.click();
	});
});

next.forEach(button => {
	button.addEventListener('click', function (e) {
		e.preventDefault();
		let pop = getPopup(button);
		let next = pop.popup.parentElement.nextElementSibling.querySelector(
			'a.member-card'
		);
		pop.content.scroll(0, 0);
		pop.close.click();
		next.click();
	});
});
