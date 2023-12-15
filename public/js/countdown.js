// countdown.js
function updateCountdown(memoId, createdAt, updatedAt, period) {
    console.log(memoId);
    console.log(createdAt);
    console.log(updatedAt);
    console.log(period);

    var createdAtDate = new Date(createdAt);
    var updatedAtDate = new Date(updatedAt);
    var currentDate = new Date();
    

    if (updatedAtDate > createdAtDate) { 
        let passedDays = Math.floor((currentDate - updatedAtDate) / (1000 * 60 * 60 * 24));
        period = period - passedDays;

        if (period <= 0) {
            $('#countdown' + memoId).text('期限切れ');
        } else {
            $('#countdown' + memoId).text('残り' + period + '日');
        }
    } else {
        let passedDays = Math.floor((currentDate - createdAtDate) / (1000 * 60 * 60 * 24));
        period = period - passedDays;

        if (period <= 0) {
            $('#countdown' + memoId).text('期限切れ');
        } else {
            $('#countdown' + memoId).text('残り' + period + '日');
        }
    }
}
