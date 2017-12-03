import java.util.Arrays;
import java.util.Scanner;

public class IntersectingCircles {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int[] circleArgs = Arrays.stream(scan.nextLine()
                .split(" ")).mapToInt(Integer::parseInt).toArray();
        Point center1 = new Point(circleArgs[0], circleArgs[1]);
        int radius1 = circleArgs[2];
        Circle circle1 = new Circle(center1, radius1);
        circleArgs = Arrays.stream(scan.nextLine()
                .split(" ")).mapToInt(Integer::parseInt).toArray();
        Point center2 = new Point(circleArgs[0], circleArgs[1]);
        int radius2 = circleArgs[2];
        Circle circle2 = new Circle(center2, radius2);
        if (intersect(circle1, circle2)) System.out.println("Yes");
        else System.out.println("No");
    }

    private static boolean intersect(Circle circle1, Circle circle2) {
        double distance = Math.sqrt(Math.pow(Math.abs(circle1.center.x - circle2.center.x), 2)
                + Math.pow(Math.abs(circle1.center.y - circle2.center.y), 2));
        if (distance <= (circle1.radius + circle2.radius)) return true;
        else return false;
    }

    public static class Circle {

        private Point center;

        public Point getCenter() {
            return center;
        }

        public void setCenter(Point center) {
            this.center = center;
        }

        private int radius;

        public int getRadius() {
            return radius;
        }

        public void setRadius(int radius) {
            this.radius = radius;
        }

        public Circle(Point center, int radius) {
            this.center = center;
            this.radius = radius;
        }
    }

    public static class Point {

        private int x;

        public int getX() {
            return x;
        }

        public void setX(int x) {
            this.x = x;
        }

        private int y;

        public int getY() {
            return y;
        }

        public void setY(int y) {
            this.y = y;
        }

        public Point(int x, int y) {
            this.x = x;
            this.y = y;
        }
    }
}
