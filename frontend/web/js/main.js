/* If you call doneCb([value], true), the next edit will be automatically 
   activated. This works only in the first round. */
function acEditFn(container, data, doneCb) {
  var input = $('<input type="text">')
  input.val(data)
  input.blur(function() { doneCb(input.val()) })
  input.keyup(function(e) { if ((e.keyCode||e.which)===13) input.blur() })
  container.html(input)
  input.focus()
}
 
/* Called whenever bracket is modified
 *
 * data:     changed bracket object in format given to init
 * userData: optional data given when bracket is created.
 */
function saveFn(data, userData) {
  var json = jQuery.toJSON(data)
  //console.log('userData:'+userData)
  //console.log('json es: '+json)             
  //$.post("index.php?r=lan-brackets%2Fview"+"&id="+ retParam("id"), {'data':json});
  $.post("index.php?r=tournaments%2Fview"+"&id="+ retParam("id"), {'data':json});
  autoCompleteData = data;
} 
 
function  retParam(name)
{ var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results[1] || 0;
}     
 
function acRenderFn(container, data, score, state) {
    if(state=='empty-bye'){
      container.append('BYE')
      return;
    }
    else if(state=='empty-tbd'){
      container.append('Upcomming')
      return;
    }
    else{
      container.append(data)
      return;
    }
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function pot2(n){
  var i=0, n2=1;
  //console.log('pot2 n: '+n)
  while(n2<n){
    n2 = Math.floor(n2*2);
    i++;
  }
  return i;
}

function pow2(n){
  var i=1;
  //console.log('pot2 n: '+n)
  while(n>0){
    i = Math.floor(i*2);
    n--;
  }
  return i;
}

var arrayEquilibra=[];

function equilibra(n, nivel, max){//arrayEquilibra es global
  if(n>0 && nivel<=max){
    if(n==1 && nivel==max){
      arrayEquilibra.push(1);
      //console.log(1);
    }
    else if(n==1){
      arrayEquilibra.push(0);
      //console.log(0);
    }
    equilibra(Math.floor(n/2)+n%2, nivel+1, max);
    equilibra(Math.floor(n/2)    , nivel+1, max);
  }
}
//*/
function cambiarOrden(json){
  var array = [];
  var njson={ teams:[], results:[]};
  for (var i = json.teams.length - 1,j=0; i >= 0; i--,j++) {
    //if(json.teams[j][0] != null)
      array.push(json.teams[j][0]);
    //if(json.teams[j][0] != null)
      array.push(json.teams[j][1]);
  }
  array = shuffle(array);
  for (var i = array.length - 1,j=0; i >= 0; i-=2,j+=2) {
    njson.teams.push([array[j], array[j+1]]);
  }
  return njson;  
}

function cambiarOrdenEq(json){
  var array = [];
  var njson={ teams:[], results:[]};
  var total=0, n=0;
  for (var i = json.teams.length - 1,j=0; i >= 0; i--,j++) {
    if(json.teams[j][0] != null){
      array.push(json.teams[j][0]);
      total++;
    }
    if(json.teams[j][1] != null){
      array.push(json.teams[j][1]);
      total++;
    }
    n+=2;
  }
  console.log('jugadores (no null): '+total+' en total: '+n)
  array = shuffle(array);
  arrayEquilibra = [];
  var n2 = pot2(total);
  equilibra(total, 0, n2);
  console.log(arrayEquilibra)
  console.log('fin equilibrio')
  console.log('n2: '+n2+' pow2: '+pow2(n2))
  for (var i=0,j=0; i<pow2(n2); i+=2) {
    var v1,v2;
    
    v1 = arrayEquilibra[i  ]==1 ? array[j++] : null;
    v2 = arrayEquilibra[i+1]==1 ? array[j++] : null;
    njson.teams.push([v1, v2]);
  }
  return njson;  
}

function reload(){
  $('#autoComplete').bracket({
    teamWidth: 100,
    scoreWidth: 20,
    matchMargin: 10,
    roundMargin: 50,
    skipConsolationRound: true,
    init: autoCompleteData,
    save: saveFn,
    decorator: {edit: acEditFn,
                render: acRenderFn}
  });
}

function ordenarEq(){
  autoCompleteData = cambiarOrdenEq(autoCompleteData)
  saveFn(autoCompleteData)
  reload();
}

function generarBracket(){
  console.log('generando bracket')
  $('#autoComplete').bracket({
    teamWidth: 100,
    scoreWidth: 20,
    matchMargin: 10,
    roundMargin: 50,
    skipConsolationRound: true,
    init: autoCompleteData,
    save: saveFn,
    decorator: {edit: acEditFn,
                render: acRenderFn}
  })
}

function verBracket(){
  console.log('generando bracket1')
  $('#autoComplete').bracket({
      init: autoCompleteData,
      decorator: {edit: acEditFn,
                  render: acRenderFn}
  })
}



$(document).ready(function() {  
  //console.log(autoCompleteData)
  console.log('hi')
  //if($('#autoComplete').attr('name')=="admin"){
  //console.log($('#autoComplete').attr('name'));
  if($('#autoComplete').attr('name')=="bracket"){
    console.log('vBracket: '+vBracket)
    if(vBracket==1)
      generarBracket();
    else if(vBracket==2)
      verBracket();
  //}else if($('#autoComplete').attr('name')=="view"){
  }else if($('#autoComplete').attr('name')=="view"){
    verBracket();
  }

  $('#reset-bracket').click(function(){
    ordenarEq();
  });

  $('#reset-button').click(function(){
    console.log('click en O')
    //ordenarEq()
  });
  
})

/*
var minimalData = {
    teams : [
      ["Team 1", "Team 2"], // first matchup 
      ["Team 3", "Team 4"],  // second matchup
      ["Team 5", "Team 6"],
      ["Team 8", "Team 7"],
      ["Team X", null],
      [null, null],
      [null, null],
      [null, null]
    ],
    results : [
    ]
  };
  console.log('datos');

  
  //var json1 = jQuery.toJSON(minimalData)
  //console.log(minimalData)
  //console.log(minimalData.teams[0])
  var njson={ teams:[], results:[]};
  for (var i = minimalData.teams.length - 1,j=0; i >= 0; i--,j++) {
    console.log(minimalData.teams[j][0]+' vs. '+minimalData.teams[j][1]);
    njson.teams.push([minimalData.teams[j][1], minimalData.teams[j][0]]);
  }
  console.log(njson)
  //njson = cambiarOrden(njson)
  //njson = cambiarOrdenEq(njson)
*/
