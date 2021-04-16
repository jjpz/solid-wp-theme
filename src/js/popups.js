const popups = document.querySelectorAll('[data-toggle="popup"]');
const prev = document.querySelectorAll('a.popup-prev');
const next = document.querySelectorAll('a.popup-next');

// Team member popups
popups.forEach(popup => {
	popup.addEventListener('click', function (e) {
		e.preventDefault();
		let target = this.dataset.target;
		let classes = this.dataset.classes;
		let pop = document.getElementById(target);
		let container = pop.querySelector('.popup-container');
		container.scroll(0, 0);
		document.body.classList.toggle('no-scroll');
		pop.classList.toggle(classes);
	});
});

// Team member popup navigation
function getPopup(button) {
	let target = button.dataset.target;
	let popup = document.getElementById(target);
	let container = popup.querySelector('.popup-container');
	let close = popup.querySelector('.popup-close');
	return { popup, container, close };
}

// Team member popup navigation previous button
prev.forEach(button => {
	button.addEventListener('click', function (e) {
		e.preventDefault();
		let pop = getPopup(button);
		let prev = pop.popup.parentElement.previousElementSibling.querySelector('a');
		pop.container.scroll(0, 0);
		pop.close.click();
		prev.click();
	});
});

// Team member popup navigation next button
next.forEach(button => {
	button.addEventListener('click', function (e) {
		e.preventDefault();
		let pop = getPopup(button);
		let next = pop.popup.parentElement.nextElementSibling.querySelector('a');
		pop.container.scroll(0, 0);
		pop.close.click();
		next.click();
	});
});
