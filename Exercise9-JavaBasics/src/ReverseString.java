import java.util.Scanner;

public class ReverseString {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String input = scan.nextLine();
        String reverse = new StringBuffer(input).reverse().toString();
        System.out.println(reverse);
    }
}
