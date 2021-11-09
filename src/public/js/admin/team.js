let btnIncrease = document.getElementById('btn-increase-team-member-limit')
let btnDecrease = document.getElementById('btn-decrease-team-member-limit')
let teamMemberLimitLabel = document.getElementById('team-member-limit')

// Call at init for disable needed buttons
$(function () {
  setTeamMemberLimit(teamMemberLimitLabel.innerHTML)
})

btnDecrease.onclick = function () {
  setTeamMemberLimit(parseInt(teamMemberLimitLabel.innerHTML) - 1)
}

btnIncrease.onclick = function () {
  setTeamMemberLimit(parseInt(teamMemberLimitLabel.innerHTML) + 1)
}

function setTeamMemberLimit (limit) {
  $.ajax({
    url: 'admin/team-member-limit',
    type: 'post',
    dataType: 'json',
    data: { member_limit: limit },
    success: function (data) {
      if (data.status == 'success') {
        teamMemberLimitLabel.innerHTML = limit
        btnDecrease.disabled = false
        btnIncrease.disabled = false

        if (limit <= data.min) {
          btnDecrease.disabled = true
        } else if (limit >= data.max) {
          btnIncrease.disabled = true
        }
      } else if (data.status == 'error') {
        console.log(data.message)
      }
    }
  })
}
