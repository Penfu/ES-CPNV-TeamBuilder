let btnIncrease = document.getElementById('btn-increase-team-member-limit')
let btnDecrease = document.getElementById('btn-decrease-team-member-limit')
let teamMemberLimitLabel = document.getElementById('team-member-limit')

btnDecrease.onclick = function () {
  var value = teamMemberLimitLabel.innerHTML

  if (value >= 2) {
    value--
    teamMemberLimitLabel.innerHTML = value
  }
}

btnIncrease.onclick = function () {
  var value = teamMemberLimitLabel.innerHTML

  if (value <= 5) {
    value++
    teamMemberLimitLabel.innerHTML = value
  }

  $.ajax({
    url: 'admin/team-member-limit',
    type: 'post',
    dataType: 'json',
    data: { limit: value },
    success: function (result) {
      console.log(result.minLimit)
      console.log(result.maxLimit)
    }
  })
}
