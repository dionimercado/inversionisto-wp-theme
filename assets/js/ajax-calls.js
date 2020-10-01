jQuery(document).ready(function ($) {
  jQuery(".inversionisto-tracking").on("click", function (e) {
    // console.log(e);
    // e.preventDefault();

    var origin_id = $(this).data("origin");
    var agent_id = $(this).data("agent");
    var source = $(this).data("source");
    var ip_address = $(this).data("ip");

    // console.log({
    //   origin_id,
    //   agent_id,
    //   source,
    // });

    jQuery.ajax({
      type: "POST",
      url: ajax_object.ajaxurl,
      data: {
        action: "inversionito_track_click",
        origin_id: origin_id,
        agent_id: agent_id,
        source: source,
        ip_address: ip_address,
      },
      cache: false,
      // processData: false,
      // contentType: false,
      // timeout: 15000,
      async: true,
      headers: {
        "cache-control": "no-cache",
      },
    });
  });
});
