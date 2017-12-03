import java.util.Scanner;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class ChangeToUppercase {

    public static void main(String[] args) {
        Pattern upcase = Pattern.compile("<upcase>(.*?)<\\/upcase>");
        Scanner scan = new Scanner(System.in);
        String text = scan.nextLine();
        Matcher match = upcase.matcher(text);
        while (match.find()) {
            String excerpt = match.group(1).toUpperCase();
            text = text.replaceFirst("<upcase>(.*?)<\\/upcase>", excerpt);
        }
        System.out.println(text);
    }
}
