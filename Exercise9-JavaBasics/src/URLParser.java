import java.util.Scanner;

public class URLParser {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String url = scan.nextLine();
        String protocol = "";
        if (url.contains("://")) {
            url = url.replaceFirst("://", "ѣ");
            protocol = url.split("ѣ")[0];
            url = url.split("ѣ")[1];
        }
        String resource = "";
        if (url.matches(".+\\/.+")) {
            url = url.replaceFirst("/", "ѣ");
            resource = url.split("ѣ")[1];
            url = url.split("ѣ")[0];
        }
        String server = "";
        if (url.endsWith("/")) server = url.substring(0,url.length() - 1);
        else server = url;
        System.out.println("[protocol] = \"" + protocol + "\"");
        System.out.println("[server] = \"" + server + "\"");
        System.out.println("[resource] = \"" + resource + "\"");
    }
}
