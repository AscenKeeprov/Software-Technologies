import java.util.Scanner;

public class ReverseCharacters {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        StringBuilder letters = new StringBuilder();
        letters.append(scan.next("[a-zA-Z]"));
        letters.append(scan.next("[a-zA-Z]"));
        letters.append(scan.next("[a-zA-Z]"));
        String reversedLetters = letters.reverse().toString();
        System.out.println(reversedLetters);
    }
}
