document.getElementById("pangbutton").disabled = true;
			let errors="";
			function calculator() {
				let oDist = document.getElementById('distance').value;
				let name = document.getElementById('name').value;
				let weight = document.getElementById('weight').value;
				let wf = weightf();
				let wadist = wfdist(wf);
				let oTime = timetosecs();
				oTime =secstotime(oTime);
				let watime = wftime(wf);
				let outputer = "<tr><td><b>" + toTitleCase(name) + "</b></td><td>" + weight + "</td><td>" + oDist + "</td><td>" + oTime + "</td><td>" + wadist + "</td><td>" + watime + "</td></tr>";
				let div = document.getElementById('resultArea');
				div.innerHTML = div.innerHTML + outputer;
			};

			function weightf(){
				let kg = document.getElementById('weight').value;
				kg = kg * 2.20462;
				let wf = (kg/270);
				wf = Math.pow(wf, 0.222);
				wf= wf.toFixed(3);
				return wf;
			};

			function timetosecs() {
				let hrs = document.getElementById('hours').value;
				let mins = document.getElementById('minutes').value;
				let secs = document.getElementById('seconds').value;	
				return hrs * (60 * 60) + mins * 60 + secs *1;
			};
			
			function secstotime(totalSeconds) {
				let hours = Math.floor(totalSeconds / 3600);
				totalSeconds %= 3600;
				let minutes = Math.floor(totalSeconds / 60);
				let seconds = Math.floor((totalSeconds % 60)*10)/10;
				return hours + ":" + minutes + ":" + seconds;
			};

			function wfdist(wf) {
				let dist = document.getElementById('distance').value;
				dist = dist/wf;
				dist = Math.floor(dist);
				return dist
			};

			function wftime(wf) {
				let time = timetosecs();
				return secstotime(wf * time);
			};
			function checknum(number){
				if (isNaN(number.value)){
					errors += "<li>" + toTitleCase(number.id) + " must be a number!</li>";
					document.getElementById('error').innerHTML = errors;
				} else{
					document.getElementById('error').innerHTML = "";
					errors="";
				}
			};
			function formatOutput(){

			}
			function toTitleCase(str)
			{
   				return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
			};

			function validate(){
			  var elems = document.getElementsByClassName( 'required' );
			  var allgood = true;

			  //Loop through all elements with this class
			  for( var i = 0; i < elems.length; i++ ) {
			    if( !elems[i].value || !elems[i].value.length ) {
			      elems[i].className += " error";
			      allgood = false;
			    } 
			  }

			  //If any element did not meet the requirements, prevent it from being submitted and display an alert
			  if( !allgood ) {
			    //alert( "Please fill in all the required fields." );
			    document.getElementById("pangbutton").disabled = true;
			    return false;
			  } else{
			  	document.getElementById("pangbutton").disabled = false;
			  }

			  //Otherwise submit the form
			  return true;
			};
			function sortTable(table, col, reverse) {
    			var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        		tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        		i;
    			reverse = -((+reverse) || -1);
    			tr = tr.sort(function (a, b) { // sort rows
	        		return reverse // `-1 *` if want opposite order
	            	* (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
	                .localeCompare(b.cells[col].textContent.trim())
	               	);
    			});
    			for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
			}

			function makeSortable(table) {
			    var th = table.tHead, i;
			    th && (th = th.rows[0]) && (th = th.cells);
			    if (th) i = th.length;
			    else return; // if no `<thead>` then do nothing
			    while (--i >= 0) (function (i) {
			        var dir = 1;
			        th[i].addEventListener('click', function () {sortTable(table, i, (dir = 1 - dir))});
			    }(i));
			}

			function makeAllSortable(parent) {
			    parent = parent || document.body;
			    var t = parent.getElementsByTagName('table'), i = t.length;
			    while (--i >= 0) makeSortable(t[i]);
			}

window.onload = function () {makeAllSortable();};