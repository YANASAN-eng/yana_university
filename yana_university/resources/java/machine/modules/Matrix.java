package modules;

/**
 * 行列算法
 */
public class Matrix {
    // 行列の総和
    public double[][] add(double[][]... matrices) throws Exception{
        // 最初の行列の列、行数を取得する
        int length_x = matrices[0].length;
        int length_y = matrices[0][0].length;
        for (int i = 0; i < matrices.length; i++) {
            if (matrices[i].length != length_x || matrices[i][0].length != length_y) {
                throw new Exception("行列の行数、列数は一致させる必要があります。");
            }
        }
        double[][] result = new double[length_x][length_y];
        for (int i = 0; i < matrices.length; i++) {
            for (int j = 0; j < length_x; j++) {
                for (int k = 0; k < length_y; k++) {
                    result[j][k] = result[j][k] + matrices[i][j][k];
                }
            }
        }
        return result;
    }
    // スカラー積
    public double[][] scalar(double alpha, double A[][]){
        double[][] result = new double[A.length][A[0].length];
        for (int i = 0; i < A.length; i ++) {
            for (int j = 0; j < A[0].length; j++) {
                result[i][j] = alpha * A[i][j];
            }
        }
        return result;
    }
    // 行列の積
    public double[][] times(double A[][], double B[][]) throws Exception {
        if (A[0].length != B.length) {
            throw new Exception("第一引数の列数と第二引数の行数は一致させる必要があります。");
        }
        double[][] result = new double[A.length][B[0].length];
        for (int i = 0; i < A.length; i++) {
            for (int j = 0; j < B[0].length; j++) {
                for (int k = 0; k < A[0].length; k++) {
                    result[i][j] = result[i][j] + A[i][k] * B[k][j];
                }
            }
        }
        return result;
    }
    // LD分解
    public double[][][] LU(double[][] A) throws Exception{
        if (A.length != A[0].length) {
            throw new Exception("Aは正方行行列である必要があります。");
        }
        double[][] L = new double[A.length][A[0].length];
        double[][] U = new double[A.length][A[0].length];
        double[][][] LU = new double[2][A.length][A[0].length];
        for (int i = 0; i < A.length; i++) {
            for (int j = i; j < A.length; j++) {
                double sum = 0;
                for (int k = 0; k < i; k++) {
                    sum = sum + L[j][k] * U[k][i];
                }
                L[j][i] = A[j][i] - sum;
                sum = 0;
                for (int k = 0; k < i; k++) {
                    sum = sum + L[i][k] * U[k][j];
                }
                if (j == i) {
                    U[j][j] = 1;
                } else {
                    U[i][j] = (A[i][j] - sum) / L[i][i];
                }
            }
        }
        LU[0] = L;
        LU[1] = U;
        return LU;
    } 
    // 行列式の値
    public double determination(double[][] A) throws Exception{
        double[][] L = this.LU(A)[0];
        double result = 1;
        for (int i = 0; i < L.length; i++) {
            result = result * L[i][i];
        }
        return result;
    }
    // 行列を表示
    public void display(String str, double A[][]){
        System.out.println(str + ":");
        for (int i = 0; i < A.length; i++) {
            for (int j = 0; j < A[0].length; j++) {
                if (j < A[0].length - 1) {
                    System.out.print(A[i][j] + " ");
                } else {
                    System.out.println(A[i][j]);
                }
            }
        }
    }
    public void display(double A[][]){
        System.out.println("行列:");
        for (int i = 0; i < A.length; i++) {
            for (int j = 0; j < A[0].length; j++) {
                if (j < A[0].length - 1) {
                    System.out.print(A[i][j] + " ");
                } else {
                    System.out.println(A[i][j]);
                }
            }
        }
    }
}