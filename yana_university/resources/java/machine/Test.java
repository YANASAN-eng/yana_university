import modules.Vector;
import modules.Matrix;
import modules.Operator;
import modules.Function;
import modules.Functions;
import modules.Layer;

public class Test {
    public static void main(String[] args) {
        try {           
            Operator operator = new Operator();

            Function[] functions1 = {Functions.sin, Functions.cos};
            Function[] functions2 = {Functions.square, Functions.cube};
            Layer layer1 = new Layer(
                new double[][] {
                    {1.0, 2.0},
                    {3.0, 4.0}
                },
                new double[] {0.0, 0.0}
            );
            Layer layer2 = new Layer(
                new double[][] {
                    {1.0, 2.0},
                    {3.0, 4.0}
                },
                new double[] {0.0, 0.0},
                functions2
            );
            double[] input = {1.0, 2.0};
            double[] output = operator.conection(input, layer1, layer2);
            Vector vector = new Vector();
            vector.display(output);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}