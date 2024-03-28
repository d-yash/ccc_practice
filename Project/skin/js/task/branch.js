function renderAgent(branchId) {
  let xmlObj = new XMLHttpRequest();
  xmlObj.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById(
          "agent"
        ).innerHTML = this.responseText;
    }
  }
//   console.log("before open");
  xmlObj.open("get", `save?branch_id=`+branchId, true);
  xmlObj.send();
}
