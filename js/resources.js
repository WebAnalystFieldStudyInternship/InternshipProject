function showResources(id, name, number) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resourcesHere").innerHTML = this.responseText;
        }
    };
	xmlhttp.open("GET", "php/includes/resourceGet.php?resourceid=" + id + "&county=" + name + "&number=" + number, true);
    xmlhttp.send();
  }
  
//takes a county name & assignment id & sends a request to the server to return buttons for each resource type that is currently assigned to that county
  function resourceList(name, number) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resourceList").innerHTML = this.responseText;
        }
    };
	xmlhttp.open("GET", "php/includes/resourceList.php?county=" + name + "&number=" + number, true);
    xmlhttp.send();
}

//when a button created by the above function is pressed, this one sends a request to the server to return a table of resources in the category that was clicked
function categorySort(catName) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sortedResources").innerHTML = this.responseText;
        }
    };
	xmlhttp.open("GET", "../../php/includes/categoryGet.php?categoryname=" + catName, true);
    xmlhttp.send();
}

//when a state is selected from a dropdown list, this function sends a request to the server to return all counties located in that state
function getCounties(stateID) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("countyForState").innerHTML = this.responseText;
        }
    };
	xmlhttp.open("GET", "../../php/includes/countyGet.php?statename=" + stateID, true);
    xmlhttp.send();
}
//when Rock county is clicked from the map, this function passes its name and county assignment id to an xmlhttp request 
function selectRockCounty() {
	var countyName = "Rock";
	var countyNum = 54;
	resourceList(countyName, countyNum);
  }