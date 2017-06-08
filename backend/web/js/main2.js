var doubleElimination = {
  "teams": [
    ["fi:Team 1", "fi:Team 2"],
    ["fi:Team 3", "fi:Team 4"]
  ],
  "results": [            // List of brackets (three since this is double elimination)
    [                     // Winner bracket
      [[1, 2], [3, 4]],   // First round and results
      [[5, 6]]            // Second round
    ],
    [                     // Loser bracket
      [[7, 8]],           // First round
      [[9, 10]]           // Second round
    ],
    [                     // Final "bracket"
      [                   // First round
        [11, 12],         // Match to determine 1st and 2nd
        [13, 14]          // Match to determine 3rd and 4th
      ],
      [                   // Second round
        [15, 16]          // LB winner won first round (11-12) so need a final decisive round
      ]
    ]
  ]
}

/* Data for autocomplete */
var acData = ["kr:MC", "ca:HuK", "se:Naniwa", "pe:Fenix",
              "us:IdrA", "tw:Sen", "fi:Naama"]
 
/* If you call doneCb([value], true), the next edit will be automatically 
   activated. This works only in the first round. */
function acEditFn(container, data, doneCb) {
  var input = $('<input type="text">')
  input.val(data)
  input.autocomplete({ source: acData })
  input.blur(function() { doneCb(input.val()) })
  input.keyup(function(e) { if ((e.keyCode||e.which)===13) input.blur() })
  container.html(input)
  input.focus()
}
 
function acRenderFn(container, data, score, state) {
  switch(state) {
    case 'empty-bye':
      container.append('BYE')
      return;
    case 'empty-tbd':
      container.append('TBD')
      return;
 
    case 'entry-no-score':
    case 'entry-default-win':
    case 'entry-complete':
      /*var fields = data.split(':')
      if (fields.length != 2)
        container.append('<i>INVALID</i>')
      else
        container.append('<img src="site/png/'+fields[0]+'.png"> ').append(fields[1])
      return;
      */
      container.append(data)
  }
}
 
$(function() {
    $('div#autoComplete').bracket({
      skipConsolationRound: true,
      init: doubleElimination,
      save: function(){}, /* without save() labels are disabled */
      decorator: {edit: acEditFn,
                  render: acRenderFn}})
})



