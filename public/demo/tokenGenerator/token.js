// Agora client options
let options = {
    appid: null,
    channel: null,
    uid: null,
    cert: null,
    token: null,
    profile: "",
    role: "audience", // host or audience
    audienceLatency: 2
};

let appProfiles = [
    { label: "nate", detail: "Profile nate", value: "nate" },
    { label: "RTT", detail: "Profile RTT", value: "RTT" }
  ];
var curProfile;
// the demo can auto join channel with params in url
$(() => {
    initAppProfiles();
    $(".profile-list").delegate("a", "click", function(e){
        changeAppProfile(this.getAttribute("label"));
    });
    let urlParams = new URL(location.href).searchParams;
    options.appid = urlParams.get("appid");
    options.channel = urlParams.get("channel");
    options.cert = urlParams.get("cert");
    options.uid = urlParams.get("uid");
    if (options.appid && options.channel) {
        $("#uid").val(options.uid);
        $("#appid").val(options.appid);
        $("#cert").val(options.cert);
        $("#channel").val(options.channel);
        //$("#join-form").submit();
    }
})


$("#generate").click(async function (e) {
    e.preventDefault();
    $("#reset").attr("disabled", true);
    try {
        options.appid = $("#appid").val();
        options.cert = $("#cert").val();
        options.channel = $("#channel").val();
        options.uid = Number($("#uid").val());
        let res = await generate();
        if(res) {
            $('#local-player').html(res.result)
        }
    } catch (error) {
        console.error(error);
    } finally {
        $("#reset").attr("disabled", false);
    }
})


async function generate() {
    let url = '/api/v1/rtctoken?profile='+options.profile+'&channel='+options.channel+'&uid='+options.uid;
    if(options.appid && options.cert) {
        url += '&appid='+options.appid+"&cert="+options.cert;
    }
    const response = await fetch(url);
    const data = await response.json();
    return data; 
}

function initAppProfiles () {
    appProfiles.forEach(profile => {
      $(".profile-list").append(`<a class="dropdown-item" label="${profile.label}" href="#">${profile.label}: ${profile.detail}</a>`)
    });
    curProfile = appProfiles[0];
    $(".profile-input").val(`${curProfile.detail}`);
    options.profile = curProfile.value;
  }
  
  async function changeAppProfile (label) {
    curProfile = appProfiles.find(profile => profile.label === label);
    $(".profile-input").val(`${curProfile.detail}`);
    options.profile = curProfile.value;
  }
  