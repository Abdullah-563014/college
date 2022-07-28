

// Js all common function are below

function checkEmailValidation(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function passwordStrengthCheck(password) {
    var strength = 0;
    if (password.match(/[a-z]+/)) {
        strength += 1;
    }
    if (password.match(/[A-Z]+/)) {
        strength += 1;
    }
    if (password.match(/[0-9]+/)) {
        strength += 1;
    }
    if (password.match(/[$@#&!]+/)) {
        strength += 1;
    }
    return strength;
}

function filterProductTitle(title) {
    if (title && title.length >= 12) {
        return title.substring(0, 11);
    }
    return title;
}

function filterProductShortDescription(shortDescription) {
    if (shortDescription && shortDescription.length >= 150) {
        return shortDescription.substring(0, 149) + "...";
    }
    return shortDescription;
}

function showAverageReviews(average) {
    let reviews = "<div>";
    for (let i = 0; i < 5; i++) {
        if (i < parseInt(average)) {
            reviews += '<span><img src="' + $siteUrl + '/images/star-fill.svg" alt="rating"></span>';
        } else {
            reviews += '<span><img src="' + $siteUrl + '/images/star.svg" alt="rating"></span>';
        }
    }
    reviews += "</div>";
    return reviews;
}

function timeSince(date) {
    let seconds = Math.floor((new Date() - date) / 1000);

    let interval = seconds / 31536000;

    if (interval > 1) {
        return Math.floor(interval) + " years";
    }
    interval = seconds / 2592000;
    if (interval > 1) {
        return Math.floor(interval) + " months";
    }
    interval = seconds / 86400;
    if (interval > 1) {
        return Math.floor(interval) + " days";
    }
    interval = seconds / 3600;
    if (interval > 1) {
        return Math.floor(interval) + " hours";
    }
    interval = seconds / 60;
    if (interval > 1) {
        return Math.floor(interval) + " minutes";
    }
    return Math.floor(seconds) + " seconds";
}

function getProfilePicFromUrl(url) {
    if (url) {
        return $siteUrl + "/uploads/images/profile/" + url;
    }
    return $siteUrl + "/images/profile/temporary_profile_pic.png";
}

function commentTimeFormat(createdAt) {
    let date = new Date(createdAt + " UTC");
    // const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return months[(date.getMonth())] + " " + date.getDate() + ", " + date.getFullYear() + " | " + strTime;
}

function getCreationMonthAndYear(createdAt) {
    const targetYear = createdAt.split(" ")[0].split("-")[0];
    const targetMonth = createdAt.split(" ")[0].split("-")[1];
    const targetDate = createdAt.split(" ")[0].split("-")[2];

    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    return months[parseInt(targetMonth) - 1].substring(0, 3) + " " + targetDate + ", " + targetYear;
}


