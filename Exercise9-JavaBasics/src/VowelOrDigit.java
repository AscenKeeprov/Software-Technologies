import java.util.Scanner;

public class VowelOrDigit {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String input = scan.nextLine();
        if (input.matches("[aAeEiIoOuU]"))
            System.out.println("vowel");
        else if (input.matches("[0-9]"))
            System.out.println("digit");
        else System.out.println("other");
    }
}
