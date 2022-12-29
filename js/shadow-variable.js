const articleList = []; // In a real app this list would be full of articles.

// Reviews
/*
  Bonnes pratiques : Préférer l'utilisation de let,
  plutôt que var pour les variables dont les valeurs ne sont pas constantes

  Maintenabilité et lisibilité du code :
  Modifier le nom de la variable pour un nom plus clair et précis, par exemple "maxKudos"
  puisqu'ici il s'agit du nombre maximum de kudos qui pourront être associé à un article
*/
var kudos = 5;

function calculateTotalKudos(articles) {
  var kudos = 0;

  // Reviews
  /*
		Bonnes pratiques : Dans ce cas, préférer l'utilisation d'une const plutôt que let,
		puisque qu'à priori, la valeur ne changera pas
	*/
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

// Reviews
/*
  Bonnes pratiques : Éviter d'utiliser des méthodes dont l'utilisation est découragée.
  De plus, pour utiliser la méthode write, celle-ci doit être précédée par une méthode open,
  et suivie par une méthode close.

  Pour remplacer la methode write, il est possible d'utiliser par exemple insertAdjacentHTML
*/
document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);
