<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习</title>
	<script src="vue.js"></script>
	<script src="jquery-1.9.1.min.js"></script>
</head>
<body>
<style type="text/css">
	body {
	  margin: 0;
	}

	table {
	  width: 100%;
	  border-collapse: collapse;
	}

	.selected {
	  background-color: yellow;
	  font-weight: bold;
	}

	td {
	  border: 1px solid red;
	  padding: 3px;
	}
</style>
<div id="test">
<div id="app">
  <table>
    <tr v-for="(index, row) in rows" :class="{ selected: isSelected(row[0]) }">
      <td>
        <input v-model.number="selected" type="checkbox" :value="row[0]">
      </td>
      <td v-for="cell in row">
        {{ cell }}
      </td>
    </tr>
  </table>
  <div v-if="selected.length">
    <button @click="delete">
      Delete {{ selected.join(', ') }}
    </button>
  </div>
</div>
</div>
<table id="data" hidden>
  <tr>
    <td>Name 1</td>
    <td>Age 1</td>
    <td>Whatever 1</td>
  </tr>
  <tr>
    <td>Name 2</td>
    <td>Age 2</td>
    <td>Whatever 2</td>
  </tr>
  <tr>
    <td>Name 3</td>
    <td>Age 3</td>
    <td>Whatever 3</td>
  </tr>
  <tr>
    <td>Name 4</td>
    <td>Age 4</td>
    <td>Whatever 4</td>
  </tr>
  <tr>
    <td>Name 5</td>
    <td>Age 5</td>
    <td>Whatever 5</td>
  </tr>
  <tr>
    <td>Name 6</td>
    <td>Age 6</td>
    <td>Whatever 6</td>
  </tr>
  <tr>
    <td>Name 7</td>
    <td>Age 7</td>
    <td>Whatever 7</td>
  </tr>
  <tr>
    <td>Name 8</td>
    <td>Age 8</td>
    <td>Whatever 8</td>
  </tr>
  <tr>
    <td>Name 9</td>
    <td>Age 9</td>
    <td>Whatever 9</td>
  </tr>
  <tr>
    <td>Name 10</td>
    <td>Age 10</td>
    <td>Whatever 10</td>
  </tr>
</table>

<script>
var app =new Vue({
	el: '#test #app',
  data: {
  	rows: [],
    selected: [],
  },
  methods: {
  	isSelected(index) {
    	return this.selected.indexOf(index) !== -1
    },
  	delete() {
      this.rows = this.rows.filter((row) => {
      	return this.selected.indexOf(row[0]) === -1;
      })
      this.selected = []
    },
  },
  created() {
  	const table = document.querySelector('#data')
    const rows = table.querySelectorAll('tr')

    for (let i = 0; i < rows.length; i++) {
    	const cells = rows[i].querySelectorAll('td')
      
      this.rows.push([]);
      this.rows[i].push(i)

      for (let j = 0; j < cells.length; j++) {
      	this.rows[i].push(cells[j].innerHTML)
      }
    }
  }
})
</script>
</body>
</html>

