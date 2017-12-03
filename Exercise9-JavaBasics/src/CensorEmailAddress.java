import java.util.Scanner;

public class CensorEmailAddress {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String email = scan.nextLine();
        String username = email.split("@")[0];
        String domain = email.split("@")[1];
        String stars = new String(new char[username.length()])
                .replace('\0', '*');
        String text = scan.nextLine();
        String censored = text.replaceAll(username + "@"  + domain,
                stars + "@" + domain);
        System.out.println(censored);
    }
}
