const popups = document.querySelectorAll('[data-toggle="popup"]');
const prev = document.querySelectorAll('a.team-prev');
const next = document.querySelectorAll('a.team-next');

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
	});
});

// Team member popup navigation
function getPopup(button) {
	let target = button.dataset.target;
	let popup = document.getElementById(target);
	let content = popup.querySelector('.popup-content');
	let close = popup.querySelector('.popup-close');
	return { popup, content, close };
}

// Team member popup navigation previous button
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

// Team member popup navigation next button
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
