$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

$('#btnCollapse').click(()=>{
  $('#sidebarContent').css('z-index',9999)
  $('#sidebarContent').width(300)
  $('#sidebarContent').height('100%')
  $('#sidebarContent').css('top',0)
  $('#sidebarContent').css('overflowY','auto')
})
$('#btn-close-sidebar').click(()=>{
  $('#sidebarContent').removeClass('show')
})
$(function(){
  $('.menu-sidebar').hover(function(){
    $(this).css('background-color','rgba(0,0,0,0.05)')
  },
  function(){
    $(this).css('background-color','#f8f9fa')
  })
})

$('#iconSearch').hover(function(){
  $('#divSearch').removeClass('d-none')
  $('#divSearch').width(200)
  $('#divSearch').css('left','-50px')
  },
  function(){
    $('#divSearch').addClass('d-none')
  }
)