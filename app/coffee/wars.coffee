###
  wars.coffee
###

$ ->
  $('#warcountdown').countdown until: $countdown, timezone: 0, format: 'DHMS', layout: '{dn} {dl} {hnn}{sep}{mnn}{sep}{snn}', labels: $labels unless typeof $countdown is 'undefined'
