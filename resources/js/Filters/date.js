export default function ago (date) {
    return moment(date).local().fromNow()
}