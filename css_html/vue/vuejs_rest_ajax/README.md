# Exercice de todo avec API AJAX

1. Installer le serveur :
```bash
cd server
npm install
npm run server
```

2. Lancer le serveur
```bash
cd server
npm run server
```


## API :

### URL de l'API
```javascript
const apiUri = "http://localhost:3000/";
```

### update
```javascript
fetch(apiUri + 'todo/' + id, {
	method: 'PATCH',
	headers: {
		'Accept': 'application/json',
		'Content-Type': 'application/json'
	},
	body: data
});
```

## create
```javascript
fetch(apiUri + 'todo', {
	method: 'POST',
	headers: {
		'Accept': 'application/json',
		'Content-Type': 'application/json'
	},
	body: data
});
```

## delete
```javascript
fetch(apiUri + 'todo/' + id, {
	method: "DELETE"
});
```
