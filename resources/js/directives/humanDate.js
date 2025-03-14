import dayjs from "dayjs" //liberary to manipulate data
import relativeTime from 'dayjs/plugin/relativeTime'
import utc from 'dayjs/plugin/utc'
import timezone from 'dayjs/plugin/timezone'

dayjs.extend(relativeTime)
dayjs.extend(utc)
dayjs.extend(timezone)

dayjs.tz.setDefault('UTC')

export default (el) => {
    let datetime = el.getAttribute('datetime')

    if(!datetime){
        return
    }

    const setHumanTime = () => {
        el.innerText = dayjs().tz().to(dayjs.tz(datetime)) 
    }

    setHumanTime() //invoking this function

    setInterval(setHumanTime, 30000)

}