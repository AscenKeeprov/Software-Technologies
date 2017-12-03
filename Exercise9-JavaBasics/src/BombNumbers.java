import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;

public class BombNumbers {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int[] coordinates = Arrays.stream(scan.nextLine().trim().split(" "))
                .mapToInt(Integer::parseInt).toArray();
        List<Integer> targets = new ArrayList<Integer>();
        for (int c = 0; c < coordinates.length; c++) targets.add(coordinates[c]);
        int [] bombSpecs = Arrays.stream(scan.nextLine().trim().split(" "))
                .mapToInt(Integer::parseInt).toArray();
        int bomb = bombSpecs[0];
        int yield = bombSpecs[1];
        int field = targets.size();
        for (int t = 0; t < field ; t++) {
            if (targets.get(t) == bomb) {
                if (t - yield < 0) {
                    targets.subList(0, t).clear();
                    field -= t;
                    if (targets.size() - 1 - yield < 0) {
                        targets.subList(0, targets.size()).clear();
                        field = 0;
                    }
                    else {
                        targets.subList(0, yield + 1).clear();
                        field -= yield + 1;
                    }
                }
                else {
                    targets.subList(t - yield, t).clear();
                    field -= yield;
                    if (targets.size() - 1 - t  < 0) {
                        targets.subList(t - yield, targets.size()).clear();
                        field = 0;
                    }
                    else {
                        targets.subList(t - yield, t + 1).clear();
                        field -= yield + 1;
                    }
                }
                t = -1;
            }
        }
        int survivors = 0;
        for (int survivor : targets) survivors += survivor;
        System.out.println(survivors);
    }
}
