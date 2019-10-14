document.querySelectorAll(".product").forEach(el => {
	console.log(el);
	el.addEventListener("click", () => 
	{
		console.log(el.getAttribute('id'))
	});
})