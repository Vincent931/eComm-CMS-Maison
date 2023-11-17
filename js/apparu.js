const ratio=.1;
const options = {
  root: null,
  rootMargin: '0px',
  threshold: ratio
}

const handleIntersectL = function(entries,observerL){
	entries.forEach(function(entry){
		if(entry.intersectionRatio > ratio){
			entry.target.classList.add('reveal-visibleL');
			observerL.unobserve(entry.target);
		}
	})
}

const handleIntersectR = function(entries,observerR){
	entries.forEach(function(entry){
		if(entry.intersectionRatio > ratio){
			entry.target.classList.add('reveal-visibleR');
			observerR.unobserve(entry.target);
		}
	})
}
/*chargement de la classe après le code javascript*/
/*document.documentElement.classList.add('reveal-loaded');*/
const observerL = new IntersectionObserver(handleIntersectL, options);
const observerR = new IntersectionObserver(handleIntersectR, options);

document.querySelectorAll('.revealL').forEach(function(l){
	observerL.observe(l);
})

document.querySelectorAll('.revealR').forEach(function(r){
	observerR.observe(r);
})

