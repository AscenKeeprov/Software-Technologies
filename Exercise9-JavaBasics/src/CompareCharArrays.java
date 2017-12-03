import java.util.Scanner;

public class CompareCharArrays {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        char[] charr1 = scan.nextLine()
                .replaceAll("\\s", "").toCharArray();
        char[] charr2 = scan.nextLine()
                .replaceAll("\\s", "").toCharArray();
        compare(charr1, charr2);
    }

    private static void compare(char[] charr1, char[] charr2) {
        int minLength = Math.min(charr1.length, charr2.length);
        char[] first = charr1;
        char[] second = charr2;
        boolean areEqual = true;
        for (int c = 0; c < minLength; c++) {
            char c1 = Character.toLowerCase(charr1[c]);
            char c2 = Character.toLowerCase(charr2[c]);
            if (c1 < c2) {
                areEqual = false;
                break;
            }
            if (c1 > c2) {
                first = charr2;
                second = charr1;
                areEqual = false;
                break;
            }
        }
        if (areEqual && charr1.length > charr2.length) {
                first = charr2;
                second = charr1;
        }
        System.out.println(first);
        System.out.println(second);
    }
}
