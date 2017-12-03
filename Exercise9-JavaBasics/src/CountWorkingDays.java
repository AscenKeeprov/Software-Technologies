import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.*;

public class CountWorkingDays {

    public static void main(String[] args) throws ParseException {
        Calendar start = Calendar.getInstance();
        Calendar end = Calendar.getInstance();
        Calendar holidays = Calendar.getInstance();
        DateFormat df = new SimpleDateFormat("dd-MM-yyyy");
        Scanner scan = new Scanner(System.in);
        Date startDate = df.parse(scan.nextLine());
        Date endDate = df.parse(scan.nextLine());
        if (startDate.before(endDate)) {
            start.setTime(startDate);
            end.setTime(endDate);
        }
        else if (startDate.after(endDate)) {
            start.setTime(endDate);
            end.setTime(startDate);
        }
        end.add(Calendar.DATE, 1);
        List<Date> holidates = new ArrayList<Date>();
        holidates.add(df.parse("01-01-1972"));
        holidates.add(df.parse("03-03-1972"));
        holidates.add(df.parse("01-05-1972"));
        holidates.add(df.parse("06-05-1972"));
        holidates.add(df.parse("24-05-1972"));
        holidates.add(df.parse("06-09-1972"));
        holidates.add(df.parse("22-09-1972"));
        holidates.add(df.parse("01-11-1972"));
        holidates.add(df.parse("24-12-1972"));
        holidates.add(df.parse("25-12-1972"));
        holidates.add(df.parse("26-12-1972"));
        int workDays = 0;
        while (start.before(end)) {
            Date date = start.getTime();
            boolean isHoliday = false;
            for (Date holidate : holidates) {
                holidays.setTime(holidate);
                if (holidays.get(Calendar.DAY_OF_MONTH) == start.get(Calendar.DAY_OF_MONTH)
                        && holidays.get(Calendar.MONTH) == start.get(Calendar.MONTH )) {
                    isHoliday = true;
                    break;
                }
            }
            boolean isWeekend = false;
            if (start.get(Calendar.DAY_OF_WEEK) == Calendar.SATURDAY
                    || start.get(Calendar.DAY_OF_WEEK) == Calendar.SUNDAY) {
                isWeekend = true;
            }
            if (!isHoliday && !isWeekend) workDays++;
            start.add(Calendar.DATE, 1);
        }
        System.out.println(workDays);
    }
}
