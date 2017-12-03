import java.util.Scanner;

public class IndexOfLetters {

    public static void main(String[] args) {
        String alphabet = "abcdefghijklmnopqrstuvwxyz";
        Scanner scan = new Scanner(System.in);
        String[] word = scan.nextLine().split("");
        for (int c = 0; c < word.length ; c++) {
            if (alphabet.contains(word[c])) {
                System.out.println(word[c] + " -> " + alphabet.indexOf(word[c]));
            }
        }
    }
}
